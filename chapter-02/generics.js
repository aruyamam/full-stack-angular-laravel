function genericFunction(arg) {
    var myGenericArray = [];
    myGenericArray.push(arg);
    return myGenericArray;
}
var stringFromGenericFucntion = genericFunction('Some string goes here');
console.log(stringFromGenericFucntion[0]);
var numberFromGenericFuction = genericFunction(190);
console.log(numberFromGenericFuction[0]);
