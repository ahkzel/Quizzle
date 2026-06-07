const themeFilter = document.getElementById("theme-filter");
if (themeFilter) {
    themeFilter.addEventListener("change", function() {
        const theme = this.value.toLowerCase();
        const rows = document.querySelectorAll(".quizz-table tbody tr");

        rows.forEach(row => {
            const rowTheme = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
            row.style.display = (theme === "" || rowTheme === theme) ? "" : "none";
        });
    })
}