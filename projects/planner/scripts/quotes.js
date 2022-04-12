fetch('https://type.fit/api/quotes')
    .then(response => {
        return response.json();
    })
    .then((data => {
        let index = Math.floor(Math.random() * data.length);
        const quote = data[index].text;
        let author = data[index].author;

        if (author == null){
            author = "Unknown";
        }
        
        const quoteSectionText = `
        <section id = "quoteSection"
        <p id = "quoteText">"${quote}"</p>
        <p id = "quoteAuthor">-${author}</p>
        </section>`

        document.querySelector('#openingSlideSection').innerHTML += quoteSectionText;

    }));