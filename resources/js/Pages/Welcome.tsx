import React from "react";
import FileUploadForm from "../Components/FileUploadForm";
import FileList from "../Components/FileList";

interface WelcomeProps {
    files: FileInterface[];
}

export interface FileInterface {
    id: number;
    file_name: string;
    file_path: string;
}

const Welcome:React.FC<WelcomeProps> = (props) =>{


    return (
        <div>
            <FileUploadForm/>
            <FileList files={props.files}/>
        </div>
    )

}

export default Welcome;

