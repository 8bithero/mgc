$( document ).ready(function() {
    if($('#snap-logo').length > 0){
            function shuffle(o){ //v1.0
                for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
                return o;
            };
            var myArray =[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50];
            newArray = shuffle(myArray);

            var logo = Snap.select("#snap-logo"),
                parts_even = [
                    ["A1",       [0, 10]], 
                    ["A2",      [10, 0]], 
                    ["A3",     [10, 0]],
                    ["A4",    [0,10]],
                    ["A5",    [0, -10]],
                    ["A6",       [0,-10]],
                    ["A7",     [-10, 0]],
                    ["A8",       [0, 10]], 
                    ["A9",      [10, 0]], 
                    ["A10",     [10, 0]],
                    ["A11",    [0,10]],
                    ["A12",    [0, -10]],
                    ["A13",       [0,-10]],
                    ["A14",     [-10, 0]],
                    ["A15",       [0, 10]], 
                    ["A16",      [10, 0]], 
                    ["A17",     [10, 0]],
                    ["A18",    [0,10]],
                    ["A19",    [0, -10]],
                    ["A20",       [0,-10]],
                    ["A21",     [-10, 0]],
                    ["A22",       [0, 10]], 
                    ["A23",      [10, 0]], 
                    ["A24",     [10, 0]],
                    ["A25",    [0,10]],
                    ["A26",    [0, -10]],
                    ["A27",       [0,-10]],
                    ["A28",     [-10, 0]],
                    ["A29",    [0, -10]],
                    ["A30",       [0,-10]],
                    ["A31",     [-10, 0]],
                    ["A32",       [0, 10]], 
                    ["A33",      [10, 0]], 
                    ["A34",     [10, 0]],
                    ["A35",    [0,10]],
                    ["A36",    [0, -10]],
                    ["A37",       [0,-10]],
                    ["A38",     [-10, 0]],
                    ["A39",       [0, 10]], 
                    ["A40",      [10, 0]], 
                    ["A41",     [10, 0]],
                    ["A42",    [0,10]],
                    ["A43",    [0, -10]],
                    ["A44",       [0,-10]],
                    ["A45",     [-10, 0]],
                    ["A46",       [0, 10]], 
                    ["A47",      [10, 0]], 
                    ["A48",     [10, 0]],
                    ["A49",    [0,10]],
                    ["A50",    [0, -10]],
                    ["A51",       [0,-10]]
                ],

                i = 0,
                showTimer = null,
                hideTimer = null;


            for (i = 0; i < parts_even.length; i++) {
                var el = parts_even[newArray[i]],
                element = logo.select("#" + el[0]);
                element.attr({
                    opacity: 0,
                    transform: "t" + el[1]
                });
                parts_even[i].push(element);
            }

            i = 0;

            function showEach_even() {
                clearTimeout(hideTimer);

                parts_even[i][2].animate({ 
                    transform: "t0,0",
                    opacity: 1
                }, 80, mina.easeout);
                showTimer = setTimeout(showEach_even, 20);
                i++;
                if (i >= parts_even.length) i = parts_even.length-1;
            }


            setTimeout(function () {

                showEach_even();
            }, 15);
    }
});