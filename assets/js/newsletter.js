const newsForms = document.querySelectorAll('.news-form');

newsForms.forEach(item => {
    item.addEventListener("submit" , (e) => {
        e.preventDefault();
        const inputs = e.target.elements;
        const successMsg = e.target.querySelector('.js-success-message');
        const inputEmail = inputs["email"];
        const email = inputEmail.value;

        fetchEmail(email).then(r => {
            let message = r.message;
            successMsg.style.opacity = '1';
            successMsg.append(message);
            inputEmail.value = '';
            setTimeout(() => {
                successMsg.style.opacity = '0';
                setTimeout(() => {
                    successMsg.innerHTML = '';
                }, 1000)
            }, 3000);

        });

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

