document.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        url: '/api',
        method: 'post',
        dataType: 'application/json',
        data: {method: 'getGames'},
        success: function(data){
            console.log(data);
            let items = document.querySelector('.item')
            for(let i = 0; i < data["items"].length; i++)
            {
                alert(data["items"][i]["name"]);
            }
        }
    })
})