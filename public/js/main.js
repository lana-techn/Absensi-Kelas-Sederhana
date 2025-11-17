let showpass = document.getElementById('show_password');
let inputpass = document.getElementById('password');



showpass.addEventListener('click', function(){
    if(showpass.checked == true){
        inputpass.setAttribute('type' , 'text')
    }else{
        inputpass.setAttribute('type' , 'password')
    }
})
