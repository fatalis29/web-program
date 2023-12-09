
    // Array of Babad Tanah Jawa
const babadArray = [
    { name: 'demak', content: 'Babad ini fokus pada sejarah Kerajaan Demak, salah satu kerajaan Islam pertama di Jawa. Kerajaan Demak memainkan peran penting dalam menyebarkan agama Islam di pulau Jawa.' },
    { name: 'kraton', content: ' Naskah ini berfokus pada sejarah keraton (istana) di Jawa, terutama sejarah keraton Yogyakarta dan Surakarta. Babad Kraton juga mencakup aspek-aspek kehidupan sehari-hari di dalam keraton.' },
    { name: 'cirebon', content: 'Berkaitan dengan sejarah dan legenda Cirebon, babad ini memberikan informasi tentang perkembangan Islam di wilayah Cirebon.' }
];

function showBabad(babadName) {
    // Hide all babad-info divs
    const babadInfos = document.querySelectorAll('.babad-info');
    babadInfos.forEach((info) => {
        info.style.display = 'none';
    });

    // Show the selected babad-info div
    const selectedBabad = document.getElementById(`babad-${babadName}`);
    selectedBabad.style.display = 'block';

    // Find the corresponding babad content from the array
    const babadContent = babadArray.find(babad => babad.name === babadName);
    if (babadContent) {
        selectedBabad.innerHTML = `<p>${babadContent.content}</p>`;
    }
}

