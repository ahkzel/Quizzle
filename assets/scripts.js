document.getElementById("theme-filter").addEventListener("change", function() {
    const theme = this.value.toLowerCase();
    const rows = document.querySelectorAll(".quizz-table tbody tr");

    rows.forEach(row => {
        const rowTheme = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
        row.style.display = (theme === "" || rowTheme === theme) ? "" : "none";
    });
});

function processData(responses) {
    const counts = {};
    responses.forEach(r => {
        counts[r] = (counts[r] || 0) + 1;
    });
    return {
        labels: Object.keys(counts),
        values: Object.values(counts)
    };
}

function createChart(id, type, labels, data, colors) {
    new Chart(document.getElementById(id), {
        type: type,
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: colors || ['#4CAF50', '#8b8b8b']
            }]
        }
    });
}

createChart('quizz_score_result', 'pie', ['Points', 'Points manqués'], [user_score, max_score - user_score]);

createChart('right_answer_number_result', 'pie', ['Bonnes réponses', 'Mauvaises réponses'], [number_right_answer, total_number_of_answer - number_right_answer]);