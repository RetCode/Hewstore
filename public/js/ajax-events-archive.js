function limitStr(str, n) {
    if(str.length > n)
        return str.substr(0, n) + "...";
    else
        return str;
}

document.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        async: true,
        url: '/api',
        method: 'post',
        dataType: 'json',        
        data: {method: 'getAnnounce'},
        success: function(data){
            let items = document.querySelector('.archive-wrapper');
            let loadingGIF = document.querySelector('.loading');

            lang = getLang()
            langButton = lang == "ru" ? "ОТКРЫТЬ" : "OPEN";

            for(let i = 0; i < data["items"].length; i++)
            {
                let id = data["items"][i]["id"];
                let name = limitStr(lang == "ru" ? data["items"][i]["nameru"] : data["items"][i]["nameen"], 45);
                let desc = limitStr(lang == "ru" ? data["items"][i]["descriptionru"] : data["items"][i]["descriptionen"], 100);
                let img = data["items"][i]["img"];
                let date = data["items"][i]["date"]

                // loadingGIF.remove();

                items.innerHTML += `<div class="announcements-item">
                <img class="announcements_image" src="public/img/announcements/${img}">
                <div class="announcements_item-info">
                    <div class="announcements_item-date">
                        <img src="public/img/date.svg">
                        <p>${date}</p>
                    </div>
                    <div class="announcements_item-name">
                        <p>${name}</p>
                    </div>
                    <div class="announcements_item-description">
                        <p>${desc}</p>
                    </div>
                    <div class="announcements_item-link">
                        <a class="lang" data-text="announcements_open-link" href="/announcements?id=${id}">
                            ${langButton}
                            <img src="public/img/arrow.svg">
                        </a>
                    </div>
                </div>
            </div>`

            }
        }
    })
})