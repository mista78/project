function titleCase(str) {
    const strlow = str.toLowerCase();
    const strAry = strlow.split(' ');
    let string = [];
    let strs;
    for (let i = 0; i < strAry.length; i++) {
        strs = strAry[i].charAt(0).toUpperCase() + strAry[i].substring(1).toLowerCase();
        string.push(strs);
    }
    return string.join(' ');
}

