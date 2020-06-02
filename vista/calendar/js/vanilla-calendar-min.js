var dia;
var mes;
var anyo;
let VanillaCalendar = (function () {
  return function (t) {
    function e(t, e, a) {
      t &&
        (t.attachEvent ? t.attachEvent("on" + e, a) : t.addEventListener(e, a));
    }
    function a(t, e, a) {
      t &&
        (t.detachEvent
          ? t.detachEvent("on" + e, a)
          : t.removeEventListener(e, a));
    }
    let n = {
      selector: null,
      datesFilter: !1,
      pastDates: !0,
      availableWeekDays: [],
      availableDates: [],
      date: new Date(),
      todaysDate: new Date(),
      button_prev: null,
      button_next: null,
      month: null,
      month_label: null,
      onSelect: (t, e) => { },
      months: [
        "Gener",
        "Febrer",
        "Març",
        "Abril",
        "Maig",
        "Juny",
        "Juliol",
        "Agost",
        "Setembre",
        "Octubre",
        "Novembre",
        "Desembre"
      ],
      shortWeekday: ["Diu", "Dill", "Dim", "Dim", "Dij", "Div", "Dis"]
    };
    for (let e in t) n.hasOwnProperty(e) && (n[e] = t[e]);
    let l = document.querySelector(n.selector);
    if (!l) return;
    const d = function (t) {
      let e = document.createElement("div"),
        a = document.createElement("span");


      //Aqui el "t.getDate();"" es el día.
      //Aqui el "n.date.getMonth() + 1;" es el mes
      //Aqui el "t.getFullYear();" es el año

      //Defino al span la id de su propio dia para poder cambiar el color al llamar a la funcion
      a.id = "d" + t.getDate();

      dia = t.getDate();
      mes = n.date.getMonth() + 1;
      anyo = t.getFullYear();



      (a.innerHTML = t.getDate()),
        (e.className = "vanilla-calendar-date"),
        e.setAttribute("data-calendar-date", t);

      let l = n.availableWeekDays.filter(
        e =>
          e.day === t.getDay() ||
          e.day ===
          (function (t) {
            return [
              "sunday",
              "monday",
              "tuesday",
              "wednesday",
              "thursday",
              "friday",
              "saturday"
            ][t];
          })(t.getDay())
      ),
        d = n.availableDates.filter(
          e =>
            e.date ===
            t.getFullYear() +
            "-" +
            String(t.getMonth() + 1).padStart("2", 0) +
            "-" +
            String(t.getDate()).padStart("2", 0)
        );
      1 === t.getDate() && (e.style.marginLeft = 14.28 * t.getDay() + "%"),
        n.date.getTime() <= n.todaysDate.getTime() - 1 && !n.pastDates
          ? e.classList.add("vanilla-calendar-date--disabled")
          : n.datesFilter
            ? l.length
              ? (e.classList.add("vanilla-calendar-date--active"),
                e.setAttribute("data-calendar-data", JSON.stringify(l[0])),
                e.setAttribute("data-calendar-status", "active"))
              : d.length
                ? (e.classList.add("vanilla-calendar-date--active"),
                  e.setAttribute("data-calendar-data", JSON.stringify(d[0])),
                  e.setAttribute("data-calendar-status", "active"))
                : e.classList.add("vanilla-calendar-date--disabled")
            : (e.classList.add("vanilla-calendar-date--active"),
              e.setAttribute("data-calendar-status", "active")),
        t.toString() === n.todaysDate.toString() &&
        e.classList.add("vanilla-calendar-date--today"),
        e.appendChild(a),
        n.month.appendChild(e);


      //LLamo a la funcion de comparar la fecha de cada dia con la de las excursiones
      comparar_fechas(dia, mes, anyo);


    },
      r = function () {
        l.querySelectorAll("[data-calendar-status=active]").forEach(t => {
          t.addEventListener("click", function () {
            document
              .querySelectorAll(".vanilla-calendar-date--selected")
              .forEach(t => {
                t.classList.remove("vanilla-calendar-date--selected");
              });
            let t = this.dataset,
              e = {};
            t.calendarDate && (e.date = t.calendarDate),
              t.calendarData && (e.data = JSON.parse(t.calendarData)),
              n.onSelect(e, this),
              this.classList.add("vanilla-calendar-date--selected");

          });

        });

      },
      s = function () {
        o();
        let t = n.date.getMonth();
        for (; n.date.getMonth() === t;)
          d(n.date), n.date.setDate(n.date.getDate() + 1);
        n.date.setDate(1),
          n.date.setMonth(n.date.getMonth() - 1),
          (n.month_label.innerHTML =
            n.months[n.date.getMonth()] + " " + n.date.getFullYear()),
          r();
      },
      i = function () {
        n.date.setMonth(n.date.getMonth() - 1), s();
      },
      c = function () {
        n.date.setMonth(n.date.getMonth() + 1), s();
      },
      o = function () {
        n.month.innerHTML = "";
      };

    (this.init = function () {
      (document.querySelector(n.selector).innerHTML =
        '\n            <div class="vanilla-calendar-header">\n                <button type="button" class="vanilla-calendar-btn" data-calendar-toggle="previous"><svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg></button>\n                <div class="vanilla-calendar-header__label" data-calendar-label="month"></div>\n                <button type="button" class="vanilla-calendar-btn" data-calendar-toggle="next"><svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path></svg></button>\n            </div>\n            <div class="vanilla-calendar-week"></div>\n            <div class="vanilla-calendar-body" data-calendar-area="month"></div>\n            '),
        (n.button_prev = document.querySelector(
          n.selector + " [data-calendar-toggle=previous]"
        )),
        (n.button_next = document.querySelector(
          n.selector + " [data-calendar-toggle=next]"
        )),
        (n.month = document.querySelector(
          n.selector + " [data-calendar-area=month]"
        )),
        (n.month_label = document.querySelector(
          n.selector + " [data-calendar-label=month]"
        )),
        n.date.setDate(1),
        s(),
        (document.querySelector(
          `${n.selector} .vanilla-calendar-week`
        ).innerHTML = `\n                <span>${n.shortWeekday[0]}</span>\n                <span>${n.shortWeekday[1]}</span>\n                <span>${n.shortWeekday[2]}</span>\n                <span>${n.shortWeekday[3]}</span>\n                <span>${n.shortWeekday[4]}</span>\n                <span>${n.shortWeekday[5]}</span>\n                <span>${n.shortWeekday[6]}</span>\n            `),
        e(n.button_prev, "click", i),
        e(n.button_next, "click", c);
    }),
      (this.destroy = function () {
        a(n.button_prev, "click", i),
          a(n.button_next, "click", c),
          o(),
          (document.querySelector(n.selector).innerHTML = "");
      }),
      (this.reset = function () {
        this.destroy(), this.init();
      }),
      (this.set = function (t) {
        for (let e in t) n.hasOwnProperty(e) && (n[e] = t[e]);
        s();
      }),
      this.init();

  };

})();

//comparar_fechas(1,4,2020);
window.VanillaCalendar = VanillaCalendar;


function objetoAjax() {
  var xmlhttp = false;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}


//Funcion que le pasamos el dia, mes y anyo y compara en la base de datos si existe una excursión con inicio en esa fecha
function comparar_fechas(dia, mes, anyo) {
  //alert(dia+" de "+mes+" del "+anyo);
  //document.getElementById("d"+dia).style.color = "red";
  var idsalida =[];
  var ajax2 = objetoAjax();
  ajax2.open("POST", "../services/consulta-fecha.php", true);
  ajax2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  ajax2.send("dia=" + dia + "&mes=" + mes + "&anyo=" + anyo);

  ajax2.onreadystatechange = function () {
    if (ajax2.readyState == 4 && ajax2.status == 200) {
      var respuesta2 = JSON.parse(ajax2.responseText);
      console.log(respuesta2);
      //console.log("longitud--->"+respuesta2.length);
      for (var i = 0; i < respuesta2.length; i++) {
        //Si el array respuesta2 es más grande que 0, significa que tiene resultados por lo que comparamos fechas
        if (respuesta2.length > 0) {
          //console.log("dia=" + dia + "&mes=" + mes + "&anyo=" + anyo);
          //alert(respuesta2.result);
          //alert(respuesta2.result);
          divFecha = document.getElementById("d" + dia).parentNode;

          var today = new Date();
          var dd = parseInt(String(today.getDate()).padStart(2, '0'));
          var mm = parseInt(String(today.getMonth() + 1).padStart(2, '0')); //Enero es el 0
          var yyyy = parseInt(today.getFullYear());
          fechahoy = dd + "/" + mm + "/" + yyyy;

          fechacal = dia + "/" + mes + "/" + anyo;

          var x = fechahoy.split("/");
          var z = fechacal.split("/");

          fechahoy = x[1] + "/" + x[0] + "/" + x[2];
          fechacal = z[1] + "/" + z[0] + "/" + z[2];
          //console.log("fechacal--->"+fechacal);
          //Si la fecha de hoy es igual a la de la excursión, se pondrá de color verde.
          if (Date.parse(fechahoy) == Date.parse(fechacal)) {

            divFecha.onclick = function () { versalida(anyo + "-" + mes + "-" + dia); };

            divFecha.style.backgroundColor = "#28F97D";

            divFecha.style.border = "solid white";

            divFecha.style.borderRadius = "7px";

            //Si la fecha es anterior a la de hoy, se pondrá de un color naranja apagado
          } else if (Date.parse(fechacal) < Date.parse(fechahoy)) {

            divFecha.onclick = function () { versalida(anyo + "-" + mes + "-" + dia); };

            divFecha.style.backgroundColor = "#FFB25B";

            divFecha.style.border = "solid white";

            divFecha.style.borderRadius = "7px";

            //Si la fecha es futura, se pondrá de color azul.
          } else if (Date.parse(fechacal) > Date.parse(fechahoy)) {
            //idsalida.push(respuesta[i].result);
           
            divFecha.onclick = function () { versalida(anyo + "-" + mes + "-" + dia); };
            //divFecha.innerHTML = onclick="versalida("+respuesta2[i].result+")";

            divFecha.style.backgroundColor = "#49BFE2";

            divFecha.style.border = "solid white";

            divFecha.style.borderRadius = "7px";
          }
        }
      }

    }
  }
}

function versalida(id_sortida) {
  console.log(id_sortida)
  var ajax2 = objetoAjax();
  ajax2.open("POST", "../services/consulta-sortida-cal.php", true);
  ajax2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  ajax2.send("id_sortida=" + id_sortida);
  //var tbody = document.getElementById('resultadosalida').querySelectorAll('tbody')
  var tbody = document.getElementById('tbodys');
  var display = document.getElementById("tabla_calendario");
  // var codi_sort = document.getElementById("codi_sortida_cal").innerHTML = respuesta2[i].nom_activitat;
  // var clase_cal = document.getElementById("clase_cal").innerHTML = respuesta2[i].nom_classe;
  // var profe_asig = document.getElementById("Profe_asignat_cal").innerHTML = respuesta2[i].profesor_asignat;
  // var bum_alu = document.getElementById("num_alu_cal").innerHTML = respuesta2[i].numero_alumnes;
  // var inici = document.getElementById("inici_sortida_cal").innerHTML = fecha_inici;

  var fecha_inici;
  //console.log("id_sortida=" + id_sortida);
  ajax2.onreadystatechange = function () {
    var tabla ="";
    if (ajax2.readyState == 4 && ajax2.status == 200) {

      var respuesta2 = JSON.parse(ajax2.responseText);
      for (var i = 0; i < respuesta2.length; i++) {

        //Formato de la fecha
        fecha_inici = respuesta2[i].inici_sortida.split('-').reverse().join('/');

        display.style.display = "table";
        tabla +='<tr>';
        tabla += '<td>'+respuesta2[i].nom_activitat+'</td>';
        tabla += '<td>'+respuesta2[i].nom_classe+'</td>';
        tabla += '<td>'+respuesta2[i].profesor_asignat+'</td>';
        tabla += '<td>'+respuesta2[i].numero_alumnes+'</td>';
        tabla += '<td width="20%">'+fecha_inici+'</td>';
        tabla += '</tr>';


        console.log(tabla);

      }
        tbody.innerHTML=tabla;
    }
  }
}