const templeList = 'json/temple.json';

fetch(templeList)
    .then(result => {
            return result.json();
    })
    .then(templesList => {
            console.log(templesList);
    });