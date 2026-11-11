# MoonShine 5: визуальная проверка и совместимость с MS4

## Резюме

CSS темы на MS5 менять не пришлось. Дефекты на `form-light.png` в первом прогоне (дубль логотипа, коробка подменю «Финансы», серые бейджи, «Выйти» налезает на профиль, браузерные поля формы) были из-за 404 CSS в локальном famfi (`APP_ENV=local` берёт `/vendor/moonshine-mushrooms-theme-source/css/admin.css`, symlink указывал на несуществующий путь). На проде используется published `/vendor/moonshine-mushrooms-theme/admin.css`.

После починки symlink макет MS5 совпадает с эталоном MS4: формы, список, детальная, дашборд, сайдбар; светлая, тёмная и мобильная.

Обратная совместимость: `moonshine/moonshine: ^4.8 || ^5.0`. Браузерный прогон ветки `feature/moonshine-5` на famfi `dev` (MoonShine 4.19.5) и на famfi `feature/moonshine-5` (MoonShine 5.x-dev) — без регрессий.

## Скриншоты

Актуальные кадры в `docs/moonshine-5-check/` (форма, список, дашборд, детальная, мобильная шапка и открытое меню).

Планируемый релиз: `v1.7.0` (bump `composer.json`).

## Коммиты

- `513eb37` — feat: support MoonShine 5 (constraint, `mb_trim` fallback для PHP 8.3/MS4)
- (этот коммит) — актуальные скриншоты проверки
