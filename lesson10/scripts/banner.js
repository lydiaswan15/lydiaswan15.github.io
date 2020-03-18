window.onload = function findingBannerDay(){
    let d = new Date;
    let day = d.getDay();
    console.log(d.getDay());
    if(day == 5){
        document.querySelector('#banner').style.display = 'flex';
    }
}