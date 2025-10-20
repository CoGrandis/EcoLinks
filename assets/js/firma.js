     const canvas = document.getElementById('signature');
        const ctx = canvas.getContext("2d");
        let drawing = false;
        let prevX, prevY;
        const signature = document.getElementsByName('signature')[0];

        canvas.addEventListener("mousedown", start);
        canvas.addEventListener("mouseup", stop);
        canvas.addEventListener("mousemove", draw);
        canvas.addEventListener("touchstart", start);
        canvas.addEventListener("touchend", stop);
        canvas.addEventListener("touchmove", draw);

        function start(e) {
            drawing = true;
        }

        function stop() {
            drawing = false;
            prevX = prevY = null;
            signature.value = canvas.toDataURL();
        }

        function draw(e) {
            if (!drawing) return;
            e.preventDefault();
            const rect = canvas.getBoundingClientRect();
            const clientX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
            const clientY = e.type.includes('touch') ? e.touches[0].clientY : e.clientY;
            const currX = clientX - rect.left;
            const currY = clientY - rect.top;

            if (!prevX && !prevY) {
                prevX = currX;
                prevY = currY;
            }

            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(currX, currY);
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 2;
            ctx.stroke();
            ctx.closePath();

            prevX = currX;
            prevY = currY;
        }

        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            signature.value = "";
        }

        function onSubmit(form) {
            signature.value = canvas.toDataURL();
            return true;
        }