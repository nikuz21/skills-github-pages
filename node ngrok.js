const ngrok = require("ngrok");

(async function () {
  try {
    const url = await ngrok.connect({
      addr: "192.168.101.77:80", // Palitan ito kung ibang port ang Apache server mo
      host_header: "rewrite",
    });

    console.log(`Ngrok public URL: ${url}/caiwl/login.php`);
  } catch (err) {
    console.error("Ngrok error:", err);
  }
})();
