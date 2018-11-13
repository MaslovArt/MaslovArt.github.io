$(function() {
	
	var H_amc = 0,
		dH0 = 0,
		dT = 0,
		dTz = 0,
		Tz = 0,
		dH_op = 0,
		H_op = 0,
		A_oh = 0,
		dists = [],
		zarad = "",
		dV0sum = 0,
		result = [];

	//functions
	function calc_dTz(_Tz) {
		return _Tz - 15;
	}
	function calc_dH_op(_dH0, _H_amc, _H_op) {
		return _dH0 + (_H_amc - _H_op) / 10;
	}
	function calc_all(p1, p2) {
		return 0.1 * p1 * p2;
	}
	function calc_Awind(_Aoh, _Aw) {
		var res = _Aoh - _Aw >= 0 ? _Aoh - _Aw : _Aoh - _Aw + 60;
		return res;
	}
	function parseT(_t) {
		var res = _t >= 50 ? 50 - _t : _t;
		return res;
	}
	function readAllFromInputs() {
		H_amc = parseInt($("input[name='amcH']").val());
    	let p8t = $("input[name='deviation_P_T']").val().split(' ');
    	dH0 = parseInt(p8t[0]);
    	if (dH0 > 500) { dH0 = 500 - dH0; }
    	A_oh = parseInt($("input[name='Aoh']").val());
    	dists = $("input[name='dists']").val().split(' ');
    	H_op = parseInt($("input[name='Hop']").val());
    	Tz = parseInt($("input[name='Tz']").val());
    	dV0sum = parseFloat($("input[name='V0sum']").val());
    	zarad = $("select[name='zarad']").val();
	}


	//interface
	var i = 1;
	$('#add').click(function() {
    	$('<input class="meteo" type="text" name="meteoB' + i + '" placeholder="YN ΔT αw V">').fadeIn('fast').appendTo('.meteo-wrapper');
    	i++;
    });
    $('#calc').click(function() {
    	var meteos = [];
    	result = [];
    	readAllFromInputs();
    	dH_op = calc_dH_op(dH0, H_amc, H_op);
    	dTz = calc_dTz(Tz);

    	$.each($('.meteo'), function(index, val) {
    		 meteos.push($(val).val());
    	});

    	$.each(dists, function(index, val) {
    		 var Wx, Wz;
    		 var meteoDate = meteos[index].split(' ');
    		 var wind = calc_Awind(A_oh, parseInt(meteoDate[2]));
    		 var windComp = prompt('Wx Wz для αw ' + wind + ' Vветра ' + meteoDate[3], "2/-1").split('/');
    		 Wx = parseInt(windComp[0]); Wz = parseInt(windComp[1]);
    		 var tabVals = prompt('табличные значения для заряда ' + zarad + ' и дальности ' + val + '\nZ ΔZW ΔXW ΔXH ΔXT ΔXTz ΔXV0', "-4 -4 -85 7 -49 -21 -52").split(' ');
    		 // tabVal index 0 - dXw, 1 - dXh, 2 - dXt, 3 - dXtz, 4 - dXv  
    		 var correction = 0.00;
    		 correction += calc_all(parseInt(tabVals[2]), Wx);
    		 correction += calc_all(parseInt(tabVals[3]), dH_op);
    		 correction += calc_all(parseInt(tabVals[4]), parseT(parseInt(meteoDate[1])));
    		 correction += calc_all(parseInt(tabVals[5]), dTz);
    		 correction += parseInt(tabVals[6]) * dV0sum;
    		 var dDwz = calc_all(parseInt(tabVals[1]), Wz);
    		 var dDsum = parseInt(tabVals[0]) + dDwz;

    		 result.push(val + ' ' + correction + ' ' + dDsum);
    	});
        $.each(result, function(index, val) {
            var res = val.split(' ');
            $('<tr><td>' + res[0] + '</td><td>' + res[1] + '</td><td>' + parseFloat(res[2]).toFixed(2) + '</td></tr>').fadeIn('fast').appendTo('.res-tab');
        });

    });
    $('#test').click(function() {
    	
    });
});
