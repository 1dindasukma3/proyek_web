function filterAlumni() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('alumniTable');
    const tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        const tdName = tr[i].getElementsByTagName('td')[0];
        const tdMajor = tr[i].getElementsByTagName('td')[1];
        if (tdName || tdMajor) {
            const nameValue = tdName.textContent || tdName.innerText;
            const majorValue = tdMajor.textContent || tdMajor.innerText;
            if (nameValue.toLowerCase().indexOf(filter) > -1 || majorValue.toLowerCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}