function unknowBand(band) {
    console.log('This band: ' + band.name + ', has: ' + band.total_numbers + ' numbers');
}
var newband = {
    name: 'Black Sabbath',
    total_numbers: 4
};
console.log(unknowBand(newband));
