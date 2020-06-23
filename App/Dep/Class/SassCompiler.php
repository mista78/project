<?php
    

    class SassCompiler
    {
    
        static public function run($scss_folder, $css_folder, $format_style = "scss_formatter")
        {
            $scss_compiler = new scssc();
            $dir = null;
            $string_css = '';
            $string_sass = "";
            $scss_compiler->setImportPaths($scss_folder);
            $scss_compiler->setFormatter($format_style);
            $filelist = glob($scss_folder . "*.scss");
            $filelist = array_merge($filelist, glob(APP . "Component" . DS .  "*/*.scss" ));
            array_map('unlink', glob($css_folder . "*.css"));
            foreach ($filelist as $file_path) {
                $file_path_elements = pathinfo($file_path);
                
                $file_dir = $file_path_elements["dirname"];
                $file_name = $file_path_elements['filename'];
                $string_sass = file_get_contents($file_dir . DS . $file_name . ".scss");
                $string_css .= $scss_compiler->compile($string_sass);
            }
            $dir = $css_folder . "app" . time() . ".css";
            file_put_contents($dir, $string_css);
            return str_replace(ROOT . "Public/" , "", $dir);
        }
    }