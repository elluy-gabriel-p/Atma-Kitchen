const puppeteer = require("puppeteer");

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto("http://localhost:8000/chart", {
        waitUntil: "networkidle2",
    });
    const chartElement = await page.$("#chart-container");
    await chartElement.screenshot({ path: "public/chart.png" });
    await browser.close();
})();
