<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */

class Form {

    private array $fields; //html form elemanlarının değerleri tutulur

    public function __construct
    (
        private string $method, //form nesnesinin method değeri
        private string $action, //form nesnesinin gönderileceği sayfa
    )
    {
        $this->method = $method;
        $this->action = $action;
    }

    public static function createForm(string $method, string $action): Form //method ve action parametresi için oluşturduğumuz Form nesnesini döndürür.
    {
        $Form = new Form($method, $action);
        return $Form;
    }
 
    public static function createPostForm(string $action): Form //post form nesnesi döndürür
    {
        return self::createForm($action, "POST");
    }

    public static function createGetForm(string $action): Form //get form nesnesi döndürür.
    {
        return self::createForm($action, "GET");
    }  
     
    public function addField(string $name, string $label, ?string $defaultValue = null): void
    //label name varsa value değerlerini field arrayine ekler
    {
     $field = [
    "name"=>$name,
    "label"=>$label,
    "defaultvalue"=>$defaultValue,
    ];

    $this->fields[] = $field;
    }

    public function setMethod(string $method): void //form nesnesindeki method tipini değiştirecek
    {
      $this->method = $method;
    }

    public function render() : void //HTML FORM ALAN RENDER EDER
    {
        echo "<form action = $this->action method = $this->method >";

        foreach ($this->fields as $field) 
        {
            echo "<label for = $field["name"] > $field["label"]</label> ";
            echo "<input type = 'text' name = $field["name"] value = $field["value"] />";
        }
        echo "<button type = 'submit'>Gönder</button>";
        echo "</form>";
    }

}

   ?>

