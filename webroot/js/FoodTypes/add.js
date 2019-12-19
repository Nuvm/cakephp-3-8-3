$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter
    $.ajax({
        url: urlToLinkedListFilter,
        data: 'food_type_id=' + $('#foodtype-id').val(),
        success: function (foods) {
            foods.foods.forEach(function (item, index) {
                Vue.set(vFoods.vFoodsData,index,item);
            });
        }
    });
    $('#foodtype-id').on('change', function () {
        var FoodTypeId = $(this).val();
        if (FoodTypeId !== undefined) {
            vFoods.vFoodsData.forEach(function (item,index) {
                Vue.delete(vFoods.vFoodsData,index);
            });
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'food_type_id=' + FoodTypeId,
                success: function (foods) {
                    foods.foods.forEach(function (item, index) {
                        Vue.set(vFoods.vFoodsData,index,item);
                    });
                }
            });
        } else {
            $('#food-id').html('<option value="">Select Food Type first</option>');
        }
    });
});


