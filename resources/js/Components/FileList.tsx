import React, {useRef} from "react";
import { Inertia } from '@inertiajs/inertia';
import { ToastContainer, toast } from 'react-toastify';
import  {FileInterface}  from "../Pages/Welcome";

interface FileUploadFormProps {
    files: FileInterface[];
}
const FileList:React.FC<FileUploadFormProps> = ({ files }) => {
    return (
        <div>
            {files.map((file) => (
                <a key={file.id} href={file.file_path}>
                    <div>
                        <span>File:</span>
                        <span>{file.file_name}</span>
                    </div>
                </a>
            ))}
        </div>
    )
}

export default FileList;
