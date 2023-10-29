const form = document.getElementById("paymentForm");
var isThereError = null;
setCookie("error", "null", 1);

form.addEventListener("submit", function (e) {
  e.preventDefault();
  [...this.elements].forEach((formElement) => {
    validate(formElement.id);
  });

  if (
    !Number($('input[name="installment"]').val()) < 1 &&
    !isNaN(Number($('input[name="installment"]').val())) &&
    form.checkValidity() &&
    !isThereError &&
    getCookie("error") == "null"
  ) {
    this.submit();
  } else {
    $("#alert").html("Taksit seÃ§iniz.");
    $("#alert").show("slow");

    location.href = "#alert";
    setTimeout(() => {
      $("#alert").hide("slow");
      history.pushState(
        "",
        document.title,
        window.location.pathname + window.location.search
      );
    }, 5000);

    return false;
  }
});

[...form.elements].forEach((formElement) => {
  ["blur", "input", "paste"].forEach((method) => {
    formElement.addEventListener(method, () => {
      validate(formElement.id);
    });
  });
});

function filterRequired(
  validateElement = "",
  requiredMessage = "",
  defaultMessage = ""
) {
  if (validateElement.value == "") {
    if (validateElement.nextElementSibling.classList.contains("info")) {
      validateElement.nextElementSibling.innerText = requiredMessage;
      validateElement.nextElementSibling.classList.add("text-danger");
      document.getElementById(validateElement.id).classList.add("is-invalid");
      isThereError = true;
      setCookie("error", "required", 1);
      return false;
    }
  } else if (validateElement?.value != "") {
    if (validateElement.nextElementSibling?.classList.contains("info")) {
      validateElement.nextElementSibling.innerText = defaultMessage;
      validateElement.nextElementSibling.classList.remove("text-danger");
      document
        .getElementById(validateElement.id)
        .classList.remove("is-invalid");
      isThereError = false;
      setCookie("error", "null", 1);
      return true;
    }
  }
}

function filterMinLength(
  validateElement = "",
  minLengthMessage = "",
  minLengthValue = 0,
  defaultMessage = ""
) {
  if (
    validateElement.value.length < minLengthValue &&
    validateElement.value.length > 0
  ) {
    if (validateElement.nextElementSibling?.classList.contains("info")) {
      validateElement.nextElementSibling.classList.add("text-danger");
      validateElement.nextElementSibling.innerText = minLengthMessage;
      document.getElementById(validateElement.id).classList.add("is-invalid");
      isThereError = true;
      setCookie("error", "minLength", 1);
      return false;
    }
  } else if (
    !validateElement.value.length <= minLengthValue &&
    validateElement.value.lenght > 0
  ) {
    validateElement.nextElementSibling.innerText = defaultMessage;
    validateElement.nextElementSibling.classList.remove("text-danger");
    document.getElementById(validateElement.id).classList.remove("is-invalid");
    isThereError = false;
    setCookie("error", "null", 1);
    return true;
  }
}

function filterMaxLength(
  validateElement = "",
  maxLengthMessage = "",
  maxLengthValue = 0,
  defaultMessage = ""
) {
  if (validateElement.value.length > maxLengthValue) {
    if (validateElement.nextElementSibling?.classList.contains("info")) {
      validateElement.nextElementSibling.classList.add("text-danger");
      validateElement.nextElementSibling.innerText = maxLengthMessage;
    }
    validateElement.value = validateElement.value.substr(0, maxLengthValue);
    document.getElementById(validateElement.id).classList.add("is-invalid");
    isThereError = true;
    setCookie("error", "maxLength", 1);
    return false;
  } else if (
    !validateElement.value.length > maxLengthValue &&
    validateElement.value.lenght > 0
  ) {
    if (validateElement.nextElementSibling?.classList.contains("info")) {
      validateElement.nextElementSibling.innerText = defaultMessage;
      validateElement.nextElementSibling.classList.remove("text-danger");
      document
        .getElementById(validateElement.id)
        .classList.remove("is-invalid");
      setCookie("error", "null", 1);
      return false;
    }
    isThereError = null;
  }
}

function filterType(validateElement, type = "", errorMessage, defaultMessage) {
  if (validateElement.value.length > 0) {
    if (type == "numeric") {
      var filter = /[0-9]|\./;
      if (!filter.test(Number(validateElement.value))) {
        if (validateElement.nextElementSibling?.classList.contains("info")) {
          validateElement.value = "";
          validateElement.nextElementSibling.innerText = errorMessage;
          validateElement.nextElementSibling.classList.add("text-danger");
          document
            .getElementById(validateElement.id)
            .classList.add("is-invalid");
          setCookie("error", "type", 1);
          return false;
        }
      } else if (filter.test(Number(validateElement.value))) {
        if (validateElement.nextElementSibling?.classList.contains("info")) {
          validateElement.nextElementSibling.innerText = defaultMessage;
          validateElement.nextElementSibling.classList.remove("text-danger");
          document
            .getElementById(validateElement.id)
            .classList.remove("is-invalid");
        }
        isThereError = null;
        setCookie("error", "null", 1);
        return true;
      }
    }
  }
}

function filterMinValue(
  validateElement,
  errorMessage,
  minValue,
  defaultMessage
) {
  if (Number(validateElement.value < minValue)) {
    if (validateElement.nextElementSibling.classList.contains("info")) {
      validateElement.nextElementSibling.innerText = errorMessage;
      validateElement.nextElementSibling.classList.add("text-danger");
      document.getElementById(validateElement.id).classList.add("is-invalid");
      isThereError = true;
      setCookie("error", "minVal", 1);
      return false;
    }
  } else if (
    !validateElement.value < minValue &&
    validateElement.value >= minValue
  ) {
    if (validateElement.nextElementSibling?.classList) {
      validateElement.nextElementSibling.innerText = defaultMessage;
      validateElement.nextElementSibling.classList.remove("text-danger");
      document
        .getElementById(validateElement.id)
        .classList.remove("is-invalid");
      isThereError = false;
      setCookie("error", "null", 1);
      return true;
    }
  }
}

function filterAmount(validateElement, errorMessage, defaultMessage) {
  var amountPattern = /^\d{0,4}(\.\d{0,2})?$/;
  if (!amountPattern.test(validateElement.value)) {
    validateElement.nextElementSibling.innerText = errorMessage;
    validateElement.nextElementSibling.classList.add("text-danger");
    document.getElementById(validateElement.id).classList.add("is-invalid");
    isThereError = true;
    setCookie("error", "amount", 1);
    return false;
  } else if (!amountPattern.test(validateElement.value)) {
    if (validateElement.nextElementSibling?.classList.contains("info")) {
      validateElement.nextElementSibling.innerText = defaultMessage;
      validateElement.nextElementSibling.classList.remove("text-danger");
      document
        .getElementById(validateElement.id)
        .classList.remove("is-invalid");
      isThereError = null;
      setCookie("error", "null", 1);
      return true;
    }
  }
}

function validate(element) {
  switch (element) {
    case "company_name_surname":
      var validateElement = document.getElementById("company_name_surname");
      if (
        filterRequired(
          validateElement,
          "Firma Ã¼nvan / Ä°sim soyisim alanÄ± zorunludur.",
          "Firma Ã¼nvan yada isim, soyisim"
        )
      ) {
        filterMinLength(
          validateElement,
          "Firma Ã¼nvan / isim, soyisim alanÄ±na minimum 2 karakter girmeniz gerekmektedir.",
          2,
          "Firma Ã¼nvan yada isim, soyisim"
        );
        filterMaxLength(
          validateElement,
          "Firma Ã¼nvan / isim, soyisim alanÄ±na maksimum 100 karakter girebilirsiniz.",
          100,
          "Firma Ã¼nvan yada isim, soyisim"
        );
      }
      break;
    case "phone_number":
      var validateElement = document.getElementById("phone_number");
      if (
        filterRequired(
          validateElement,
          "Telefon numarasÄ± alanÄ± zorunludur.",
          "Telefon numarasÄ± alanÄ±"
        )
      ) {
        if (
          filterType(
            validateElement,
            "numeric",
            "Telefon numarasÄ± alanÄ± sayÄ±lsal olmalÄ±dÄ±r.",
            "Telefon numarasÄ± alanÄ±"
          )
        ) {
          filterMinLength(
            validateElement,
            "Telefon numarasÄ± alanÄ±na minimum 10 karakter girmelisiniz.",
            10,
            "Telefon numarasÄ± alanÄ±"
          );
          filterMaxLength(
            validateElement,
            "Telefon numarasÄ± alanÄ±na maksimum 11 karakter girebilirsiniz.",
            11,
            "Telefon numarasÄ± alanÄ±"
          );
        }
      }
      break;
    case "email":
      var validateElement = document.getElementById("email");
      filterRequired(
        validateElement,
        "E-Posta alanÄ± zorunludur.",
        "E-Posta adresiniz."
      );
      filterMinLength(
        validateElement,
        "E-Posta alanÄ±na minimum 5 karakter girilmesi zorunludur.",
        5,
        "E-Posta adresiniz."
      );
      filterMaxLength(
        validateElement,
        "E-Posta alanÄ±na maksimum 100 karakter girilebilir.",
        100,
        "E-Posta adresiniz."
      );
      break;
    case "description":
      var validateElement = document.getElementById("description");
      filterRequired(
        validateElement,
        "AÃ§Ä±klama alanÄ± zorunludur.",
        "Ã–deme aÃ§Ä±klamasÄ±."
      );
      filterMaxLength(
        validateElement,
        "AÃ§Ä±klama alanÄ±na maksimum 100 karakter girebilirsiniz.",
        100,
        "Ã–deme aÃ§Ä±klamasÄ±."
      );
      break;
    case "amount":
      var validateElement = document.getElementById("amount");
      filterRequired(
        validateElement,
        "Tutar alanÄ± zorunludur.",
        "TutarÄ± doÄŸru girdiÄŸinizden emin olunuz."
      );

      var filterTypeResult = filterType(
        validateElement,
        "numeric",
        "Tutar alanÄ±na yanlÄ±zca sayÄ±sal ifade giriniz!",
        "TutarÄ± doÄŸru girdiÄŸinizden emin olunuz."
      );

      if (filterTypeResult) {
        filterMinValue(
          validateElement,
          "LÃ¼tfen sÄ±fÄ±rdan bÃ¼yÃ¼k tutar giriniz.",
          1,
          "TutarÄ± doÄŸru girdiÄŸinizden emin olunuz."
        );
      }
      break;
    case "currency":
      break;
    case "cc_number":
      var validateElement = document.getElementById("cc_number");
      "Kart numarasÄ±.";
      if (
        filterRequired(
          validateElement,
          "Kart numarasÄ± alanÄ± zorunludur.",
          "Kart numarasÄ±."
        )
      ) {
        if (
          filterMinLength(
            validateElement,
            "Kart numarasÄ± en az 16 karakter olmalÄ±dÄ±r.",
            19,
            "Kart numarasÄ±."
          )
        ) {
          filterMaxLength(
            validateElement,
            "Kart numarasÄ± alanÄ±na maksimum 16 karakter girebilirsiniz.",
            19,
            "Kart numarasÄ±."
          );
        }
      }
      break;
    case "cc_holder_name":
      var validateElement = document.getElementById("cc_holder_name");
      if (
        filterRequired(
          validateElement,
          "Ä°sim, soyisim alanÄ± zorunludur.",
          "Kart sahibi isim, soyisim."
        )
      ) {
        filterMaxLength(
          validateElement,
          "Ä°sim, soyisim alanÄ±na maksimum 100 karakter girebilirsiniz.",
          100,
          "Kart sahibi isim, soyisim."
        );
      }
      break;
    case "cc_expiry":
      var validateElement = document.getElementById("cc_expiry");
      if (
        filterRequired(
          validateElement,
          "Son kullanÄ±m tarihi alanÄ± zorunludur.",
          "Ay / YÄ±l ÅŸeklinde."
        )
      ) {
        filterMaxLength(
          validateElement,
          "Son kullanÄ±m tarihi alanÄ±na maksimum 9 karakter girebilirsiniz.",
          9,
          "Ay / YÄ±l ÅŸeklinde."
        );
      }
      break;
    case "cc_cvc":
      var validateElement = document.getElementById("cc_cvc");
      filterRequired(
        validateElement,
        "CVV alanÄ± zorunludur.",
        "KartÄ±n arkasÄ±ndaki gÃ¼venlik kodu."
      );
      break;
    case "kvkk-check":
      if (!document.getElementById("kvkk-check").checked) {
        //some code are goint go come here
      }
      break;
    default:
      break;
  }
}

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
