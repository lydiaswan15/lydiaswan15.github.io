fetch('https://byui-cit230.github.io/lessons/lesson-09/data/latter-day-prophets.json')
    .then(result => {
            return result.json();
    })
    .then(prophetList => {
            let prophets = prophetList.prophets;
            console.log(prophetList[0]);
        
            prophets.forEach(prophet =>{
                let article = document.createElement('article');
                let h1 = document.createElement('h1');
                h1.textContent = `${ prophet.name} ${prophet.lastname}`;
                article.appendChild(h1);

                let dateOfBirth = document.createElement('p');
                dateOfBirth.textContent = `Date of birth: ${prophet.birthdate}`;
                article.appendChild(dateOfBirth);

                let placeOfBirth = document.createElement('p');
                placeOfBirth.textContent = `Place of Birth: ${prophet.birthplace}`;
                article.appendChild(placeOfBirth);

                let image = document.createElement('img');
                image.setAttribute('src', prophet.imageurl);
                image.setAttribute('alt', `${prophet.name} ${prophet.lastname}`);
                article.appendChild(image);

                document.getElementById('prophets').appendChild(article);

            })
    })