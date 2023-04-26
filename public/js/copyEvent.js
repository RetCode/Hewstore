let copyTarget = document.getElementById('copy_target');

copyTarget.addEventListener('click', () =>{
    let inputTarget = document.getElementById("text").value;
    clipboard.writeText(inputTarget);
})