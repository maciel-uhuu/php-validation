const formBtn = document.getElementById('form_btn');
const form = document.getElementById('form');
const accessAccountCheckbox = document.getElementById('can_access_account');

formBtn.addEventListener('click', async (event) => {
  event.preventDefault();
  const id = form.dataset['id'];
  const formData = new FormData(form);
  const requestObj = {};


  formData.forEach((value, key) => {
    requestObj[key] = value
  })

  requestObj['can_access_account'] = accessAccountCheckbox.checked;

  const response = await axios.put(`/clients/${id}`, requestObj);

  console.log(response);

  if (response.status === 200) {
    location.replace('/');
  }
});
