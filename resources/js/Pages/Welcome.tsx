import React from "react";
import FileUploadForm from "../Components/FileUploadForm";
import FileList from "../Components/FileList";
import SearchBox from "../Components/SearchBox";

interface WelcomeProps {
    files: FileInterface[];
    searchQuery: string;
}

export interface FileInterface {
    id: number;
    file_name: string;
    file_path: string;
}

const Welcome:React.FC<WelcomeProps> = (props) =>{


    return (
        <div>
            <SearchBox searchQuery={props.searchQuery} />
            <FileList files={props.files}/>
            <FileUploadForm/>
        </div>
    )

}

export default Welcome;

