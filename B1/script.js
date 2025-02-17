var canvas = document.getElementById("canvas");

class Chart {
    width = 600;
    height = 400;

    highest = 0;
    data = [];
    padding = 40;

    constructor({ data, canvas }) {
        this.data = data;
        this.canvas = canvas;
        this.canvas.width = this.width;
        this.canvas.height = this.height;

        this.ctx = this.canvas.getContext("2d");
        this.highest = Math.max(...data.map((x) => x.jumlah));

        this.start();
    }

    start() {
        // style untuk garis x dan y
        this.ctx.fillStyle = "black";

        // garis x
        const xLine = this.width - this.padding * 2;
        this.ctx.fillRect(this.padding, this.height - this.padding, xLine, 3);

        // garis y
        const yLine = this.height - this.padding * 2;
        this.ctx.fillRect(this.padding, this.padding, 3, yLine);

        // label x
        const distanceX = xLine / this.data.length;
        for (let i = 0; i < this.data.length; i++) {
            const posText = distanceX * i + this.padding + 20;
            this.ctx.fillText(this.data[i].tanggal, posText, this.height - this.padding + 20);
        }

        // label y
        const distanceY = yLine / this.highest;
        for (let i = 1; i <= this.highest; i++) {
            if (i % 5 === 0 || this.data.map((x) => x.jumlah).includes(i)) {
                const posText = yLine - distanceY * i + this.padding + 20;
                this.ctx.fillText(i.toString(), this.padding - 20, posText);
            }
        }

        // garis merah
        this.ctx.beginPath();
        this.data.forEach((data, i) => {
            const xPoint = distanceX * i + this.padding + 20;
            const yPoint = yLine - distanceY * data.jumlah + this.padding + 20;
            this.ctx.lineTo(xPoint, yPoint);
        });

        this.ctx.fillStyle = "red";
        this.ctx.stroke();
    }
}

var chart = new Chart({
    canvas,
    data: [
        {
            tanggal: 1,
            jumlah: 12,
        },
        {
            tanggal: 2,
            jumlah: 15,
        },
        {
            tanggal: 3,
            jumlah: 10,
        },
        {
            tanggal: 4,
            jumlah: 20,
        },
        {
            tanggal: 5,
            jumlah: 24,
        },
        {
            tanggal: 6,
            jumlah: 23,
        },
        {
            tanggal: 7,
            jumlah: 28,
        },
        {
            tanggal: 8,
            jumlah: 25,
        },
    ],
});
