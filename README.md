# deltaBox-NILM
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

<b>Algorithmic Non-Intrusive Load Monitoring Prototype for (embedded) Linux systems</b>
<br/>

Embedded algorithms include basic unsupervised and supervised machine learning techniques (K-means, Fuzzy K-means, EM-clustering, Bayes classifier), linear and non-linear signal processing (filtering, edge detection) and genetic algorithm type optimization for creating a finite state machine. The basic idea was pioneered by Hart, MIT.

A working prototype was realized with an ARTILA ARM-linux development card together with a custom photodiode circuit triggering on the optical output of a standard household energy meter (1k pulses/kWh). In addition, a 1-wire network support with "hot-plugging" onewire temperature sensors is included. The user interface is provided by an embedded web-server (Javascript front end, PHP & C++ back end). A SQL-database (SQLite3) is used for saving the measurement data. 

A fully working prototype was introduced and awarded in 2009 in technical innovation competition IIDA09 at Tampere University of Technology.

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
