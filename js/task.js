const formAddAssignee = document.querySelector('.form-add-assignee');
const btnAddAssignee = document.querySelector('.btn-add-assignee');
const btnCloseAssignee = document.querySelector('.btn-close-assignee');


btnAddAssignee.addEventListener('click',function(){
    formAddAssignee.classList.remove('hidden'); 
})
btnCloseAssignee.addEventListener('click',function(e){
    e.preventDefault();
    formAddAssignee.classList.add('hidden'); 
})
