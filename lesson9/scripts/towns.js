fetch('https://byui-cit230.github.io/weather/data/towndata.json')
.then(result => {
    return result.json();
})
.then(resultJSON => {
    let towns = resultJSON.towns;

    towns.forEach(
        town => {
            if(town.name === 'Fish Haven'){
                document.querySelector('#fishHavenName').textContent = town.name;
                document.querySelector('#fishHavenMotto').textContent = town.moto;
                document.querySelector('#fishHavenYearFounded').textContent = `Year Founded: ${town.yearFounded}`;
                document.querySelector('#fishHavenPopulation').textContent = `Population: ${town.population}`;
                document.querySelector('#fishHavenName').textContent = town.name;
                document.querySelector('#fishHavenAnnualRainfall').textContent = `Annual Rainfall: ${town.averageRainfall}`;
            } else if(town.name === 'Preston')
        }
    );
})