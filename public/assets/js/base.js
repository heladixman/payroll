function sidebar(){
    const toggle = document.getElementById('sidebar-toggle')
    const sidebar = document.getElementById('sidebar')
    toggle.addEventListener('click', function(event){
        sidebar.classList.toggle('d-sm-block')
    }, {once:true})
}