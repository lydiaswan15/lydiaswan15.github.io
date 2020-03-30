fetch('https://byui-cit230.github.io/weather/data/towndata.json')
    .then(result => {
            return result.json();
    })
    .then(townsList => {
            let towns = townsList.towns;
        
            towns.forEach(town =>{
                let article = document.createElement('article');
                let h2 = document.createElement('h2');
                h2.textContent = `${town.name}`;
                article.appendChild(h2);

                let motto = document.createElement('p');
                motto.textContent = `${town.motto}`;
                article.appendChild(motto);

                let yearFounded = document.createElement('p');
                yearFounded.textContent = `Year Founded: ${town.yearFounded}`;
                article.appendChild(yearFounded);

                let currentPopulation = document.createElement('p');
                currentPopulation.textContent = `Population: ${town.currentPopulation}`;
                article.appendChild(currentPopulation);

                let averageRainfall = document.createElement('p');
                averageRainfall.textContent = `Average Rainfall: ${town.averageRainfall}`;
                article.appendChild(averageRainfall);

                let image = document.createElement('img');
                image.setAttribute('src', `images/${town.photo}`);
                image.setAttribute('alt', `${town.name}`);
                article.appendChild(image);

                if(town.name === "Preston"){
                    document.getElementById('towns').appendChild(article);
                }else if(town.name === "Fish Haven"){
                    document.getElementById('towns').appendChild(article);
                }else if(town.name === "Soda Springs"){
                    document.getElementById('towns').appendChild(article);
                }

            })
    })