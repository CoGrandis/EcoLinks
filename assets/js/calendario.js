       const monthYear = document.getElementById("monthYear");
        const calendarDays = document.getElementById("calendarDays");
        const todayDate = document.getElementById("todayDate");
        const todayMonth = document.getElementById("todayMonth");

        let currentDate = new Date();

        const months = [
            "enero", "febrero", "marzo", "abril", "mayo", "junio",
            "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
        ];

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();

            monthYear.textContent = `${months[month].charAt(0).toUpperCase() + months[month].slice(1)} ${year}`;
            calendarDays.innerHTML = "";

            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();
            const prevLastDate = new Date(year, month, 0).getDate();

            for (let x = firstDay; x > 0; x--) {
                const div = document.createElement("div");
                div.textContent = prevLastDate - x + 1;
                div.classList.add("other-month");
                calendarDays.appendChild(div);
            }

            for (let i = 1; i <= lastDate; i++) {
                const div = document.createElement("div");
                div.textContent = i;

                const today = new Date();
                if (
                    i === today.getDate() &&
                    month === today.getMonth() &&
                    year === today.getFullYear()
                ) {
                    div.classList.add("today");
                }

                calendarDays.appendChild(div);
            }
        }

        document.getElementById("prev").addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        document.getElementById("next").addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        function showToday() {
            const now = new Date();
            todayDate.textContent = now.getDate();
            todayMonth.textContent = months[now.getMonth()];
        }

        renderCalendar();
        showToday();