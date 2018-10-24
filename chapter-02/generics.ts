function genericFunction<T>(arg: T): T[] {
    let myGenericArray: T[] = [];
    myGenericArray.push(arg);
    return myGenericArray;
}

let stringFromGenericFucntion = genericFunction<string>('Some string goes here');
console.log(stringFromGenericFucntion[0]);
let numberFromGenericFuction = genericFunction(190);
console.log(numberFromGenericFuction[0]);