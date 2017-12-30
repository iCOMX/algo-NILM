# deltaBox-NILM
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

<b>Algorithmic Non-Intrusive Load Monitoring Prototype for (embedded) Linux systems</b>
<br/>

Embedded algorithms include basic unsupervised and supervised machine learning techniques (K-means, Fuzzy K-means, EM-clustering, Bayes classifier), linear and non-linear signal processing (filtering, edge detection) and genetic algorithm type optimization.

A working prototype was realized with an ARTILA ARM-linux development card together with a custom photodiode circuit triggering on output of the powermeter (1k pulse/kWh). In addition, a 1-wire network support with "hot-pluggable" onewire temperature sensors is included. A SQL-database is used for saving the measurement data.

The user interface is provided by an embedded web-server (Javascript front end, PHP + C++ back end).
<br/>

<b>Mikael Mieskolainen, 2008-2009</b>

<br/>

To-Be-Done:
<br/>
Upload protodevice collected data from 2008-2018.
<br/>
Change code comments to English.

<br/>

<b>External C-Libraries Utilized:</b>

Database: SQLite3 https://www.sqlite.org/ (Public domain)

1-Wire: Dallas/Maxim  driver C-libraries ((C) 2000 Dallas Semiconductor Corporation)

<b>External Javascript Libraries Utilized:</b>

JQuery https://jquery.com/ (MIT license)

prototype.js http://prototypejs.org/ (MIT license)

script.aculo.us https://script.aculo.us/ (MIT license)

ContentFlow http://contentflow.eu (MIT license)

DHTML calendar (LGPL license)
