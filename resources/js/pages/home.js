const clientTableRows = document.querySelectorAll('.client_table_row');

async function editAccountAccess(id, btnElement) {
  try {
    await axios.patch(`/api/clients/${id}/change-account-access`, {
      'can_access_account': btnElement.checked,
    });
  } catch (err) {
    btnElement.checked = !btnElement.checked; // undo change if request fails
  }
}

function editClientAccount(event) {

}

async function deleteClient(id, element) {
  element.style.opacity = 0.5;
  const response = await axios.delete(`/clients/${id}`)

  if (response.status !== 200) {
    alert("Falha ao excluir cliente.");
    return
  }

  element.remove();
}

for (const clientRow of clientTableRows) {
  const id = clientRow.dataset['id'];
  const editAccessBtn = clientRow.getElementsByClassName('edit_client_access')?.[0];
  const editClientAccountBtn = clientRow.getElementsByClassName('edit_client_btn')?.[0];
  const deleteClientAccountBtn = clientRow.getElementsByClassName('delete_client_btn')?.[0];

  editAccessBtn.addEventListener('click', () => editAccountAccess(id, editAccessBtn));
  editClientAccountBtn.addEventListener('click', () => editClientAccount(id));
  deleteClientAccountBtn.addEventListener('click', () => deleteClient(id, clientRow));
}
