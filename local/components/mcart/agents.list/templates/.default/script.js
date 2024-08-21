BX.ready(function () {
    // 1. Спомощью document.querySelectorAll получить все DOM-элементы с классом star
    let stars = document.querySelectorAll('.star');

    // 2. Повесить обработчик события на click
    stars.forEach(function(star) {
        BX.bind(star, "click", clickStar);
    });
});

function clickStar(event) {
    event.preventDefault();

    // Получить agentID, используя dataset (предполагается, что в HTML разметке у элемента с классом star есть data-agent-id атрибут)
    let agentID = this.dataset.agentId;

    if (agentID) { // если ID есть, то делаем ajax-запрос
        BX.ajax
            .runComponentAction(
                "mcart:agents.list", // название компонента
                "clickStar", // название метода, который будет вызван из class.php
                {
                    mode: "class", // это означает, что мы хотим вызывать действие из class.php
                    data: {
                        agentID: agentID // параметры, которые передаются на бэк
                    },
                }
            )
            .then( // если на бэке нет ошибок, выполнится
                BX.proxy((response) => {
                    console.log(response); // для отладки, в конечном коде можно убрать
                    let data = response.data;
                    if (data['status'] === 'added') {
                        // Добавляем класс active для отображения добавления в избранное
                        this.classList.add('active');
                    } else if (data['status'] === 'removed') {
                        // Убираем класс active для отображения удаления из избранного
                        this.classList.remove('active');
                    }
                }, this)
            )
            .catch( // если на бэке есть ошибки, выполнится
                BX.proxy((response) => {
                    console.error(response.errors); // Выводим ошибки в консоль
                }, this)
            );
    }
}
