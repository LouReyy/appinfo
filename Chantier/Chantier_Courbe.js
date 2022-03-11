window.addEventListener("load", run, false) function rand(n) {
    return Math.floor(n * Math.random())
    } function minMax(M){
    a=Infinity
    b=-Infinity
    let L = M.length
    for(var i=0;i<L;i++){
    if (M[i]<a) {a=M[i]}
    if (M[i]>b) {b=M[i]}
    }
    return [a,b]
    } function draw(W,M,ny,nx,legendY,legendX,titre1,titre2) {
    function cc(s,n){
    while (s.length<n) s = " "+s
    return s
    }
    let m = 52 // marge
    let Lx = W.getAttribute("width")-2*m
    let Ly = W.getAttribute("height")-2*m
    
    let L = M.length
    let [a,b] = minMax(M)
    let ctx = W.getContext("2d");
    
    let d = (b-a)/ny
    let e = 0
    while (d<1) {d*=10,e--;}
    while (d>10) {d/=10,e++;}
    if(d<2) Q=1
    else if(d<4) Q=2
    else Q=5
    
    let e0=Math.floor(e/3)*3
    // pour obtenir des entiers compris entre 0 et 999
    //Erreur à corriger, valable seulement si ny=1.
    let e1=e-e0
    
    Sig = new Array("p","n","µ","m",' ',"K","M","G","T")
    let s = Sig[4+e0/3];
    
    e0=Math.pow(10,e0)
    e1=Math.pow(10,e1)
    a/=e0
    b/=e0
    Q*=e1 let a0 = Math.floor(a/Q)*Q
    a=a0 let gx = Lx/(L-1)
    let gy = Ly/(b-a)
    function fx(x) {return x*gx + m}
    function fy(y) {return Ly-(y-a)*gy + m}
    let n = (b-a)/Q+2 ctx.strokeStyle = "grey"
    //ctx.fillStyle = "rgba(255, 255, 0, .5)"
    ctx.beginPath()
    ctx.clearRect(0,0,Lx+2*m,Ly+2*m);
    for(let j=0; j<n; j++){
    g = a0 + j*Q
    if (g<b) {
    let y=fy(g)
    ctx.moveTo(m, y);
    ctx.lineTo(Lx+m, y);
    ctx.fillText(cc(g.toString()+" "+s,9), 3, y);
    }
    }
    
    ctx.stroke();
    ctx.font = "9pt serif"
    ctx.measureText("blabla")
    
    ctx.strokeStyle = "grey"
    ctx.beginPath()
    ctx.fillText(titre1, m + Lx/3, m/3);
    ctx.fillText(titre2, m + Lx/3, 2*m/3);
    ctx.moveTo(m, m);
    ctx.lineTo(m, Ly+m);
    ctx.fillText(legendY, 5, m-12);
    ctx.moveTo(m, Ly+m);
    ctx.lineTo(Lx+m, Ly+m);
    ctx.fillText(legendX, Lx + m -25, Ly + m + 25);
    ctx.stroke();
    
    ctx.strokeStyle = "red"
    ctx.beginPath()
    ctx.moveTo(fx(0),fy(M[0]/e0))
    for(let i=1;i<L;i++) ctx.lineTo(fx(i),fy(M[i]/e0))
    ctx.stroke()
    
    
    let dd = L/nx
    let ee = 0
    while (dd>10) {dd/=10,ee++;}
    if(dd<2) Q=1
    else if(dd<4) Q=2
    else Q=5
    
    let e00=Math.floor(ee/3)*3
    // pour obtenir des entiers compris entre 0 et 999
    let e1_=ee-e00
    
    Sig = new Array("p","n","µ","m",' ',"K","M","G","T")
    let sx = Sig[4+e00/3];
    e00=Math.pow(10,e00)
    e1_=Math.pow(10,e1_)
    Q*=e1_
    let dx=Q*e00
    ctx.strokeStyle = "grey"
    ctx.beginPath()
    for(let j=0; j<L; j+=dx){
    let x=fx(j)
    if (x<Lx+m) {
    ctx.moveTo(x, Ly+m);
    ctx.lineTo(x, m);
    ctx.fillText(j/e00.toString()+" "+sx, x - 4, Ly + m + 12);
    }
    }
    ctx.stroke();
    } function run(){
    var M = new Array();
    for (var i=0;i<200;i++){
    M[i] = rand(100)*rand(100)
    } W1 = document.getElementById("canvas1");
    draw(W1,M,4,4,"Valeur", "N° d'enregistrement", "Liste des valeurs", "dans l'ordre d'enregistrement");
    M.sort(function(a,b){return a>=b;}); W2 = document.getElementById("canvas2");
    draw(W2,M,4,4,"Valeur", "N° d'ordre", "Rangement des valeurs", "dans l'ordre croissant");
    }