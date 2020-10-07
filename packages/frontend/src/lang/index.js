import * as en from './en.json';
const hasTranslation = (string) =>  en[string] !== undefined;
const getTranslation = (string) =>  en[string];

export default (string) => {
    if ((typeof string === 'string' || string instanceof String) && hasTranslation(string)) {
        return getTranslation(string) || string;
    }

    return string;
}