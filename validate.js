const form = document.getElementById('form');
const name = document.getElementById('name');
// const email = document.getElementById('email');
const phoneNumber = document.getElementById('phoneNumber');
const aadharNumber = document.getElementById('aadharNumber');
const address = document.getElementById('address');
const city = document.getElementById('city');
const crimeDesc = document.getElementById('crimeDesc');

form.addEventListener('submit', e => {
    e.preventDefault();

    checkInputs();
});

function checkInputs() {
    const nameValue = name.value.trim();
    // const emailValue = email.value.trim();
    const phoneNumberValue = phoneNumber.value.trim();
    const aadharNumberValue = aadharNumber.value.trim();
    const addressValue = address.value.trim();
    const cityValue = city.value.trim();
    const crimeDescValue = crimeDesc.value.trim();

    if (nameValue === '') {
        setErrorFor(name, 'name cannot be blank');
    } else if (!isName(nameValue)) {
        setErrorFor(name, 'Name field can only contain letters and white spaces');
    } else {
        setSuccessFor(name);
    }

    // if(emailValue === '') {
    // 	setErrorFor(email, 'Email cannot be blank');
    // } else if (!isEmail(emailValue)) {
    // 	setErrorFor(email, 'Not a valid email');
    // } else {
    // 	setSuccessFor(email);
    // }

    if (phoneNumberValue === '') {
        setErrorFor(phoneNumber, 'Phone Number cannot be blank');
    } else if (!isPhoneNumber(phoneNumberValue)) {
        setErrorFor(phoneNumber, 'Incorrect Phone Number format');
    } else {
        setSuccessFor(phoneNumber);
    }

    if (aadharNumberValue === '') {
        setErrorFor(aadharNumber, 'Aadhar Number cannot be blank');
    } else if (!isAadharNumber(aadharNumberValue)) {
        setErrorFor(aadharNumber, 'Incorrect Aadhar Number');
    } else {
        setSuccessFor(aadharNumber);
    }

    if (addressValue === '') {
        setErrorFor(address, 'Address cannot be blank');
    } else if (!isAddress(addressValue)) {
        setErrorFor(address, 'Incorrect address format');
    } else {
        setSuccessFor(address);
    }

    if (cityValue === '') {
        setErrorFor(city, 'City name cannot be blank');
    } else if (!isCity(cityValue)) {
        setErrorFor(city, 'Incorrect City name Format');
    } else {
        setSuccessFor(city);
    }

    if (crimeDescValue === '') {
        setErrorFor(crimeDesc, 'Complaint field cannot be blank');
    } else if (!isCrimeDesc(crimeDescValue)) {
        setErrorFor(crimeDesc, 'Complaint field can only contain letters and white spaces');
    } else {
        setSuccessFor(crimeDesc);
    }
}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function isName(name) {
    return /^[a-zA-Z\s]+$/.test(name);
}

function isPhoneNumber(phoneNumber) {
    return /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/.test(phoneNumber);
}

function isAadharNumber(aadharNumber) {
    return /^\d{4}\s\d{4}\s\d{4}$/.test(aadharNumber);
}

function isAddress(address) {
    return /^[#.0-9a-zA-Z\s,-]+$/.test(address);
}

function isCity(city) {
    return /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/.test(city);
}

function isCrimeDesc(crimeDesc) {
    return /^[a-zA-Z\s]+$/.test(crimeDesc);
}