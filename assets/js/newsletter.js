const newsForms = document.querySelectorAll('.news-form');

newsForms.forEach(item => {
    item.addEventListener("submit" , (e) => {
        e.preventDefault();
        const inputs = e.target.elements;
        const inputEmail = inputs["email"];
        const email = inputEmail.value;

        fetchEmail(email).then(r => console.log(r));

    })
})


async function fetchEmail(email) {

    let data = {
        email : email,
    }

    const response = await fetch('/addList', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    });

    return await response.json();
}

