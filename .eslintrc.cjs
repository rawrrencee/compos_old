module.exports = {
  root: true,
  env: {
    node: true,
  },
  extends: ['plugin:vue/base', 'plugin:vue/vue3-essential', '@vue/prettier', 'eslint:recommended'],
  rules: { 'vue/multi-word-component-names': 'off' },
};
