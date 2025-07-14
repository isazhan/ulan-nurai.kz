function submitForm(form) {
    const formData = new FormData(form);

    fetch('save_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        alert('✅ Сәтті! Жауабыңыз сақталды.');
        form.reset();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('❌ Қате! Жауапты сақтай алмадық.');
    });

    return false; // Prevent default form submit
}