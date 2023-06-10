function handleClickModal(id) {
    const modalContainer = document.getElementById(`modal-container${id ? `-${id}` : ''}`);
    let show = modalContainer.classList.contains('opacity-100');
    if(show){
        modalContainer.classList.remove('opacity-100');
        modalContainer.classList.remove('pointer-events-auto');
        modalContainer.classList.add('opacity-0');
        modalContainer.classList.add('pointer-events-none');
    }else{
        modalContainer.classList.remove('opacity-0');
        modalContainer.classList.remove('pointer-events-none');
        modalContainer.classList.add('opacity-100');
        modalContainer.classList.add('pointer-events-auto');
    }
}
