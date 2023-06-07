document.addEventListener('DOMContentLoaded', init, false);

let data, table, sortCol;
let sortAsc = false;
const pageSize = 3;
let curPage = 1;

async function init() {
  
  // Select the table (well, tbody)
  table = document.querySelector('#catTable tbody');
  // get the cats
  let resp = await fetch('https://www.raymondcamden.com/.netlify/functions/get-cats');
  data = await resp.json();
  renderTable();
  
  // listen for sort clicks
  document.querySelectorAll('#catTable thead tr th').forEach(t => {
     t.addEventListener('click', sort, false);
  });
  
  document.querySelector('#nextButton').addEventListener('click', nextPage, false);
  document.querySelector('#prevButton').addEventListener('click', previousPage, false);
}

function renderTable() {
  // create html
  let result = '';
  data.filter((row, index) => {
        let start = (curPage-1)*pageSize;
        let end =curPage*pageSize;
        if(index >= start && index < end) return true;
  }).forEach(c => {
     result += `<tr>
     <td>${c.name}</td>
     <td>${c.age}</td>
     <td>${c.breed}</td>
     <td>${c.gender}</td>
     </tr>`;
  });
  table.innerHTML = result;
}

function sort(e) {
  let thisSort = e.target.dataset.sort;
  if(sortCol === thisSort) sortAsc = !sortAsc;
  sortCol = thisSort;
  console.log('sort dir is ', sortAsc);
  data.sort((a, b) => {
    if(a[sortCol] < b[sortCol]) return sortAsc?1:-1;
    if(a[sortCol] > b[sortCol]) return sortAsc?-1:1;
    return 0;
  });
  renderTable();
}

function previousPage() {
  if(curPage > 1) curPage--;
  renderTable();
}

function nextPage() {
    console.log('test')
  if((curPage * pageSize) < data.length) curPage++;
  renderTable();
}