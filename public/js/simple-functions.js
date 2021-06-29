function moeda(z) {
    v = z.value;
    v = v.replace(/\D/g, "");
    v = v.replace(/[0-9]{12}/, "inválido");
    v = v.replace(/(\d{1})(\d{8})$/, "$1.$2");
    v = v.replace(/(\d{1})(\d{5})$/, "$1.$2");
    v = v.replace(/(\d{1})(\d{1,2})$/, "$1,$2");
    z.value = v;
}