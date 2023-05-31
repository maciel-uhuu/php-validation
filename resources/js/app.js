import axios from 'axios';
import './bootstrap';

import.meta.glob([
  '../images/**',
  '../icons/**',
  '../fonts/**',
]);

// Main layout header
const signoutBtn = document.getElementById("signout_btn")

signoutBtn.addEventListener("click", async () => {
  const response = await axios.post("/signout");

  console.log(response);
});

// Clients index page
const clientTableRows = document.querySelectorAll('.client_table_row');

function editAccountAccess(event) {
  
}

function editClientAccount(event) {

}

async function deleteClient(id) {
  await axios.delete(`/clients/${id}`)
}

for (const clientRow of clientTableRows) {
  const id = clientRow.dataset['id'];
  const editAccessBtn = clientRow.getElementsByClassName('edit_client_access')?.[0];
  const editClientAccountBtn = clientRow.getElementsByClassName('edit_client_btn')?.[0];
  const deleteClientAccountBtn = clientRow.getElementsByClassName('delete_client_btn')?.[0];

  editAccessBtn.addEventListener('click', () => editAccountAccess(id));
  editClientAccountBtn.addEventListener('click', () => editClientAccount(id));
  deleteClientAccountBtn.addEventListener('click', () => deleteClient(id));
}


// // edit client
// const listOfEditClientBtn = document.getElementById("edit_client_btn");

// for (const editClientBtn of listOfEditClientBtn) {
//   editClientBtn.addEventListener("click", async () => {
//     const clientId = editClientBtn?.dataset['id'];
//   });
// }

// // edit client access


// // delete client
// const listOfDeleteClientBtn = document.getElementById("delete_client_btn");

// for (const deleteClientBtn of listOfDeleteClientBtn) {
//   deleteClientBtn.addEventListener("click", async () => {
//     const clientId = deleteClientBtn?.dataset['id'];
//     await axios.delete(`/clients/${clientId}`);
//   });
// }