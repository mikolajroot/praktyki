function calculate() {
  let ip = document.getElementById("ip").value;
  let mask = document.getElementById("mask").value;

  // zamiana adresu IP i maski na binarne
  let ipBinary = ip.split(".").map(function(num) {
    return ("00000000" + parseInt(num).toString(2)).slice(-8);
  }).join("");

  let maskBinary = "";
  for (let i = 0; i < mask; i++) {
    maskBinary += "1";
  }
  maskBinary = maskBinary.padEnd(32, "0");

  // obliczenie adresu sieci i broadcast
  let networkBinary = ipBinary.slice(0, mask);
  let broadcastBinary = ipBinary.slice(0, mask) + maskBinary.slice(mask);

  // zamiana adresu sieci i broadcast na dziesiętne
  let network = [];
  let broadcast = [];

  for (let i = 0; i < 4; i++) {
    let networkOctet = parseInt(networkBinary.slice(i * 8, i * 8 + 8), 2);
    let broadcastOctet = parseInt(broadcastBinary.slice(i * 8, i * 8 + 8), 2);

    if (isNaN(networkOctet) || networkOctet < 0) {
      network.push("0");
    } else {
      network.push(networkOctet);
    }

    if (isNaN(broadcastOctet) || broadcastOctet < 0) {
      broadcast.push("255");
    } else {
      broadcast.push(broadcastOctet);
    }
  }

  // obliczenie liczby hostów
  let hosts = Math.pow(2, 32 - mask) - 2;

  // obliczenie pierwszego i ostatniego hosta
  let firstHost = [];
  let lastHost = [];

  for (let i = 0; i < 4; i++) {
    let firstHostOctet = (i == 3) ? network[i] + 1 : network[i];
    let lastHostOctet = (i == 3) ? broadcast[i] + 254 : broadcast[i];

    if (isNaN(firstHostOctet) || firstHostOctet < 0) {
      firstHost.push("0");
    } else {
      firstHost.push(firstHostOctet);
    }

    if (isNaN(lastHostOctet) || lastHostOctet < 0) {
      lastHost.push("0");
    } else {
      lastHost.push(lastHostOctet);
    }
  }
      
        // wyświetlenie wyniku
        document.getElementById("result").innerHTML = "Adres sieci: " + network.join(".") + "<br>" +
                                                      "Adres broadcast: " + broadcast.join(".") + "<br>" +
                                                      "Pierwszy host: " + firstHost.join(".") + "<br>" +
                                                      "Ostatni host: " + lastHost.join(".") + "<br>" +
                                                      "Liczba hostów: " + hosts;
      }