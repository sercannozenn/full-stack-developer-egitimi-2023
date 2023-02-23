let resultArray = [];
function aures($inputList, inputValidate)
{
    clearHtml();
    resultArray = [];

    $inputList.each(function (index, input) {
        inputValidater(inputValidate, input);
    });

    console.log(resultArray);
    console.log(resultArray.indexOf(false));
    if (resultArray.indexOf(false) > 0)
    {
        return false;
    }
    return true;
}
function onlyUnique(value, index, array) {
    return array.indexOf(value) === index;
}
function inputValidater(inputValidate, input)
{
    let inputID = input.id;
    let validateConditions = inputValidate[inputID].split("|");

    validateConditions.forEach(function (value, index, array) {
        if (value.indexOf(":") > -1)
        {
            let valueSplit = value.split(":");
            let conditionName = valueSplit[0];
            let conditionValue = valueSplit[1];

            return validateProcess(conditionName, input, conditionValue);
        }
        else
        {
            return validateProcess(value, input);
        }
    });
}


function validateProcess(process, $input, processValue = null)
{
    var text = '';
    switch (process)
    {
        case "required":
            if ($input.value === '' || $input.value === null || $input.value === undefined)
            {
                text = "Bu alan boş geçilemez";
                validateAlert($input, text);
                resultArray.push(false);
                return false;
            }
            resultArray.push(true);
            return true;
        case "min":
            if ($input.value.length < processValue)
            {
                text = "Bu alan minimum: " + processValue + " karakter olmalıdır.";
                validateAlert($input, text);
                resultArray.push(false);
                return false;
            }
            resultArray.push(true);
            return true;
        case "max":
            if ($input.value.length > processValue)
            {
                text = "Bu alan maksimum: " + processValue + " karakter olmalıdır.";
                validateAlert($input, text);
                resultArray.push(false);
                return false;
            }
            resultArray.push(true);
            return true;
        case "type":
            if (processValue === "email")
            {
                let regex = /([a-zA-Z0-9_+.-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                let control = regex.test($input.value);
                if (!control)
                {
                    text = "Geçerli bir email adresi girin";
                    validateAlert($input, text);
                    resultArray.push(false);
                    return false;
                }
                resultArray.push(true);
                return true;
            }
            else if (processValue === "phone")
            {
                let phoneRegex = /(05[0-9]{9})+$/;
                if (phoneRegex.test($input.value))
                {
                    resultArray.push(true);
                    return true;
                }
                else
                {
                    text = "Geçerli bir telefon numarası girin";
                    validateAlert($input, text);

                    resultArray.push(false);
                    return false;
                }
            }
            else
            {
                console.log(processValue + " field bulunamadı");
                resultArray.push(false);
                return false;
            }
        default:
            console.log("Koşul bulunamadı ve işlem yapılmadı");
            resultArray.push(false);
            return false;
    }
}
function clearHtml() {
    let formElement = document.querySelector("form small");
    if (formElement)
    {
        let prevElement = formElement.previousElementSibling;
        prevElement.style.borderColor = "#ced4da";
        formElement.remove();
        clearHtml();
        return false;
    }

    let brElement = document.querySelector("form br");
    if (brElement)
    {
        console.log("çalıştı br")
        brElement.remove();
        clearHtml();
        return false;
    }
}
function validateAlert($input, text)
{
    $input.style.borderColor = "red";
    let brElement = document.createElement("br");
    let smallElement = document.createElement("small");
    smallElement.innerText = text;
    $input.after(brElement);
    $input.after(smallElement);
}