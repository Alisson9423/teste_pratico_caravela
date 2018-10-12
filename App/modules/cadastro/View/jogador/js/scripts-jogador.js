let form = document.querySelector('form');


if(form){
    
    
    switch(action()){
        case "add":
        form.addEventListener('submit',helperForm.add,false); 
        break;

        case "editar":
        form.addEventListener('submit',helperForm.edit,false); 
        break;
    }
}